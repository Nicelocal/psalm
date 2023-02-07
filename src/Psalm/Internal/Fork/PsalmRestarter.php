<?php

namespace Psalm\Internal\Fork;

use Composer\XdebugHandler\XdebugHandler;

use function array_filter;
use function array_splice;
use function extension_loaded;
use function file_get_contents;
use function file_put_contents;
use function function_exists;
use function implode;
use function in_array;
use function ini_get;
use function opcache_get_status;
use function preg_replace;

/**
 * @internal
 */
class PsalmRestarter extends XdebugHandler
{
    private bool $required = false;

    /**
     * @var string[]
     */
    private array $disabledExtensions = [];

    public function disableExtension(string $disabledExtension): void
    {
        $this->disabledExtensions[] = $disabledExtension;
    }

    /**
     * No type hint to allow xdebug-handler v1 and v2 usage
     *
     * @param bool $default
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     */
    protected function requiresRestart($default): bool
    {
        $this->required = (bool) array_filter(
            $this->disabledExtensions,
            static fn(string $extension): bool => extension_loaded($extension)
        );
        if (!function_exists('opcache_get_status')
            || !opcache_get_status(false)
            || !opcache_get_status(false)['opcache_enabled']
        ) {
            return true;
        }
        if (!in_array(ini_get('opcache.enable_cli'), ['1', 'true', true, 1])) {
            return true;
        }
        if (((int) ini_get('opcache.jit')) !== 1205) {
            return true;
        }
        if (((int) ini_get('opcache.jit')) === 0) {
            return true;
        }

        return $default || $this->required;
    }

    /**
     * No type hint to allow xdebug-handler v1 and v2 usage
     *
     * @param string[] $command
     */
    protected function restart(array $command): void
    {
        if ($this->required && $this->tmpIni) {
            $regex = '/^\s*(extension\s*=.*(' . implode('|', $this->disabledExtensions) . ').*)$/mi';
            $content = file_get_contents($this->tmpIni);

            $content = preg_replace($regex, ';$1', $content);

            file_put_contents($this->tmpIni, $content);
        }
        array_splice(
            $command,
            1,
            0,
            [
                '-dopcache.enable_cli=true',
                '-dopcache.jit_buffer_size=512M',
                '-dopcache.jit=1205',
            ],
        );
        if (!function_exists('opcache_get_status')) {
            array_splice(
                $command,
                1,
                0,
                [
                    '-dzend_extension=opcache',
                ],
            );
        }

        parent::restart($command);
    }
}
