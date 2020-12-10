<?php
namespace App\BusinessRules\Base\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeRoutes extends GeneratorCommand
{
  /**
   * O nome e a assinatura do comando do console.
   *
   * @var string
   */
  protected $name = 'make:custom_routes';

 /**
   * A descrição do comando do console.
   *
   * @var string
   */
  protected $description = 'Create a model Routes';

    /**
   * O tipo de classe sendo gerada.
   *
   * @var string
   */
  protected $type = 'Routes';

     /**
     * Substitui o nome da classe para o stub fornecido.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        $stub = $this->replaceModel($stub);
        return str_replace('DummyModel', $this->argument('name'), $stub);
    }

    protected function replaceModel($stub)
    {
        $modelPluralLowercase = Str::plural(Str::lower($this->argument('name')));
        return str_replace('model', $modelPluralLowercase, $stub);
    }
  /**
   * Obtpem o arquivo stub para o gerador.
   *
   * @return string
   */
  protected function getStub()
  {
    return  app()->path() . '/BusinessRules/Base/Commands/stubs/DummyModelRoutes.stub';
  }

      /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        $path = $this->laravel['path'].'/'.str_replace('\\', '/', $name).$this->type.'.php';

        return str_replace('DummyModel', $this->argument('name'), $path);
    }
     /**
   * Obtém o namespace padrão para a classe.
   *
   * @param  string  $rootNamespace
   * @return string
   */
  protected function getDefaultNamespace($rootNamespace)
  {
    return $rootNamespace . '\BusinessRules\DummyModel\Routes';
  }

    /**
     * Obtém os argumentos do comando do console.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model route.'],
        ];
    }
}
