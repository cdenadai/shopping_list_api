<?php
namespace App\BusinessRules\Base\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeDeleteServiceInterface extends GeneratorCommand
{
    /**
     * O nome e a assinatura do comando do console.
     *
     * @var string
     */
    protected $name = 'make:custom_delete_service_interface';

    /**
     * A descrição do comando do console.
     *
     * @var string
     */
    protected $description = 'Create a delete service interface';

        /**
     * O tipo de classe sendo gerada.
     *
     * @var string
     */
    protected $type = 'DeleteService';

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
        return str_replace('DummyModel', $this->argument('name'), $stub);
    }

    /**
     * Obtpem o arquivo stub para o gerador.
     *
     * @return string
     */
    protected function getStub()
    {
        return  app()->path() . '/BusinessRules/Base/Commands/stubs/IDummyModelDeleteService.stub';
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

        $completePath = str_replace('DummyModel', $this->argument('name'), $path);

        return str_replace($this->argument('name').$this->type, 'I'.$this->argument('name').$this->type, $completePath);
    }

     /**
   * Obtém o namespace padrão para a classe.
   *
   * @param  string  $rootNamespace
   * @return string
   */
  protected function getDefaultNamespace($rootNamespace)
  {
    return $rootNamespace . '\BusinessRules\DummyModel\Contracts';
  }

    /**
     * Obtém os argumentos do comando do console.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the service interface.'],
        ];
    }
}
