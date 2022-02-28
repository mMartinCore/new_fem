<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class customLivewireCrudCommandFive extends Command
{/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:livewire:five
    {nameOfTheClass? : The name of the class.},
    {nameOfTheModelClass? : The name of the model class.}    
    {var1? : The name of var one.},
    {var2? : The name of var two.},
    {var3? : The name of var three.}
    {var4? : The name of var four.}
    {var5? : The name of var five.}

    
    ';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a custom livewire CRUD';

    /**
     * Our custom class properties here!
     */
    protected $nameOfTheClass;
    protected $nameOfTheModelClass;
    protected $file;

    protected $var1;
    protected $var2;
    protected $var3;
    protected $var4;
    protected $var5;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = new Filesystem();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Gathers all parameters
        $this->gatherParameters();

        // Generates the Livewire Class File
        $this->generateLivewireCrudClassfile();

        // Generates the Livewire View File
        $this->generateLivewireCrudViewFile();
    }

    /**
     * Gather all necessary parameters
     *
     * @return void
     */
    protected function gatherParameters()
    {
        $this->nameOfTheClass = $this->argument('nameOfTheClass');
        $this->nameOfTheModelClass = $this->argument('nameOfTheModelClass');
        $this->var1 = $this->argument('var1');
        $this->var2 = $this->argument('var2');
        $this->var3 = $this->argument('var3');
        $this->var4 = $this->argument('var4');
        $this->var5 = $this->argument('var5');

        // If you didn't input the name of the class
        if (!$this->nameOfTheClass) {
            $this->nameOfTheClass = $this->ask('Enter a new class name');
        }

        // If you didn't input the name of the class
        if (!$this->nameOfTheModelClass) {
            $this->nameOfTheModelClass = $this->ask('Enter model name');
        }

        if (!$this->var1) {
            $this->var1 = $this->ask('Enter var 1 name');
        }
        if (!$this->var2) {
            $this->var2 = $this->ask('Enter var 2 name');
        }
        if (!$this->var3) {
            $this->var3 = $this->ask('Enter var 3 name');
        }
        if (!$this->var4) {
            $this->var4 = $this->ask('Enter var 4 name');
        }
        if (!$this->var5) {
            $this->var5 = $this->ask('Enter var 5 name');
        }


        // Convert to studly case
        $this->nameOfTheClass = Str::studly($this->nameOfTheClass);
        $this->nameOfTheModelClass = Str::studly($this->nameOfTheModelClass);
    }

    /**
     * Generates the CRUD class file
     *
     * @return void
     */
    protected function generateLivewireCrudClassfile()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/custom.livewire.crud.stub');
        $fileDestination = base_path('/app/Http/Livewire/' . $this->nameOfTheClass . '.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This class file already exists: ' . $this->nameOfTheClass . '.php');
            $this->info('Aborting class file creation.');
            return false;
        }

        // Get the original string content of the file
        $fileOriginalString = $this->file->get($fileOrigin);

        // Replace the strings specified in the array sequentially
        $replaceFileOriginalString = Str::replaceArray('{{}}',
            [
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheClass, // Name of the class

                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the variable

                $this->var1,  // Name of the validation
                $this->var2,  // Name of the validation
                $this->var3,  // Name of the validation
                $this->var4,  // Name of the validation
                $this->var5,  // Name of the validation
                
                $this->nameOfTheModelClass,// Name of the model class

                //MODEL  DATA -LOAD DATA
                $this->var1, // Name of the variable
                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the variable
                $this->var5,  // Name of the variable

                //MODEL  DATA 
                $this->var1, // Name of the variable
                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the variable
                $this->var5,  // Name of the variable
               
                $this->nameOfTheModelClass,// Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class

                // SEARCH
                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the vaRiable
                
                // $this->nameOfTheModelClass, // Name of the model class
                // $this->nameOfTheModelClass, // Name of the model class
                // $this->nameOfTheModelClass, // Name of the model class
                // $this->nameOfTheModelClass, // Name of the model class
                // $this->nameOfTheModelClass, // Name of the model class
                // $this->nameOfTheModelClass, // Name of the model class
                // $this->nameOfTheModelClass, // Name of the model class
                // $this->nameOfTheModelClass, // Name of the model class
                Str::kebab($this->nameOfTheClass), // From "FooBar" to "foo-bar"
            ],
            $fileOriginalString
        );

        // Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString);
        $this->info('Livewire class file created: ' . $fileDestination);
    }

    /**
     * generateLivewireCrudViewFile
     *
     * @return void
     */
    protected function generateLivewireCrudViewFile()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/custom.livewire.crud.view.stub');
        $fileDestination = base_path('/resources/views/livewire/' . Str::kebab($this->nameOfTheClass) . '.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: ' . Str::kebab($this->nameOfTheClass) . '.php');
            $this->info('Aborting view file creation.');
            return false;
        }

            // Get the original string content of the file
            $fileOriginalString = $this->file->get($fileOrigin);

            // Replace the strings specified in the array sequentially
            $replaceFileOriginalString = Str::replaceArray('{{}}',
            [ 
                  //MODEL  DATA 
                  $this->var1, // Name of the variable
                  $this->var1, // Name of the variable
                  $this->var2, // Name of the variable
                  $this->var2, // Name of the variable
                  $this->var3, // Name of the variable
                  $this->var3, // Name of the variable
                  $this->var4,  // Name of the variable
                  $this->var4,  // Name of the variable
                  $this->var5,  // Name of the variable
                  $this->var5,  // Name of the variable
               
                    //MODEL  DATA 
                $this->var1, // Name of the variable
                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the variable
                $this->var5,  // Name of the variable
               
                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the variable  
                
                $this->var1, // Name of the variable
                $this->var1, // Name of the variable
                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var2, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var3, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var4,  // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the variable
                $this->var5,  // Name of the variable
                $this->var5,  // Name of the variable
            ],
            $fileOriginalString
            );


     // Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString); 
         // Copy file to destination
        // $this->file->copy($fileOrigin, $fileDestination);
        $this->info('Livewire view file created: ' . $fileDestination);
    }
}