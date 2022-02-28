<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use File;

class customLivewireCrudCommand extends Command
{/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:livewire:crud
    {nameOfTheClass? : The name of the class.},
    {nameOfTheModelClass? : The name of the model class.}    
    {var1? : The name of var one.},
    {var2? : The name of var two.},
    {var3? : The name of var three.}
    {var4? : The name of var four.}
    {var5? : The name of var five.}
    {var6? : The name of var six.}
    {var7? : The name of var seven.}
    {var8? : The name of var eight.}
    {var9? : The name of var nine.}
    {var10? : The name of var ten.}
    {var11? : The name of var eleven.}
    {var12? : The name of var twelve.}
    {var13? : The name of var thirteen.}
    {var14? : The name of var fourteen.}
    {var15? : The name of var fifteen.}
    {var16? : The name of var sixteen.}
    {var17? : The name of var seventeen.}
    {var18? : The name of var eighteen.}
    {var19? : The name of var nineteen.}
    {var20? : The name of var twenty.}
    {var21? : The name of var twenty one.}

    
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
    protected $var3 ='var3';
    protected $var4 ='var4';
    protected $var5 ='var5';
    protected $var6 ='var6';
    protected $var7 ='var7';
    protected $var8 ='var8';
    protected $var9 ='var9';
    protected $var10 ='var10';
    protected $var11 ='var11';
    protected $var12 ='var12';
    protected $var13 ='var13';
    protected $var14 ='var14';
    protected $var15 ='var15'; 
    protected $var16 ='var16';
    protected $var17 ='var17';
    protected $var18 ='var18';
    protected $var19 ='var19';
    protected $var20 ='var20';
    protected $var21 ='var21';

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
        
        //makeDirectory
        $this->makeDir();

        // Generates the Livewire Class File 
        $this->generateLivewireEdit(); 
        $this->generateLivewireCreate(); 
        $this->generateLivewireIndex();

        // Generates the Livewire views File  
        $this->generateLivewireCreateView(); 
        $this->generateLivewireEditView(); 
        $this->generateLivewireIndexView(); 

        // views
        $this->generateShowView();
        $this->generateCreateView();
        $this->generateEditView();
        $this->generateIndexView();


       // Generates the   Controller File
        $this->generateController();
 
       
        // Generates the view File
        $this->generateRouteFile();
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
        $this->var6 = $this->argument('var6');
        $this->var7 = $this->argument('var7');
        $this->var8 = $this->argument('var8');
        $this->var9 = $this->argument('var9');
        $this->var10 = $this->argument('var10');
        $this->var11 = $this->argument('var11');
        $this->var12 = $this->argument('var12');
        $this->var13 = $this->argument('var13');
        $this->var14 = $this->argument('var14');
        $this->var15 = $this->argument('var15');
        $this->var16 = $this->argument('var16');
        $this->var17 = $this->argument('var17');
        $this->var18 = $this->argument('var18');
        $this->var19 = $this->argument('var19');
        $this->var20 = $this->argument('var20');
        $this->var21 = $this->argument('var21');

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
        if (!$this->var6) {
            $this->var6 = $this->ask('Enter var 6 name');
        }
        if (!$this->var7) {
            $this->var7 = $this->ask('Enter var 7 name');
        }
        if (!$this->var8) {
            $this->var8 = $this->ask('Enter var 8 name');
        }
        if (!$this->var9) {
            $this->var9 = $this->ask('Enter var 9 name');
        }
        if (!$this->var10) {
            $this->var10 = $this->ask('Enter var 10 name');
        }
        if (!$this->var11) {
            $this->var11 = $this->ask('Enter var 11 name');
        }
        if (!$this->var12) {
            $this->var12 = $this->ask('Enter var 12 name');
        }   
        if (!$this->var13) {
            $this->var13 = $this->ask('Enter var 13 name');
        }
        if (!$this->var14) {
            $this->var14 = $this->ask('Enter var 14 name');
        }
        if (!$this->var15) {
            $this->var15 = $this->ask('Enter var 15 name');
        }
        if (!$this->var16) {
            $this->var16 = $this->ask('Enter var 16 name');
        }
        if (!$this->var17) {
            $this->var17 = $this->ask('Enter var 17 name');
        }
        if (!$this->var18) {
            $this->var18 = $this->ask('Enter var 18 name');
        }
        if (!$this->var19) {
            $this->var19 = $this->ask('Enter var 19 name');
        }
        if (!$this->var20) {
            $this->var20 = $this->ask('Enter var 20 name');
        }
        if (!$this->var21) {
            $this->var21 = $this->ask('Enter var 21 name');
        }


        // Convert to studly case
        $this->nameOfTheClass = Str::studly($this->nameOfTheClass);
        $this->nameOfTheModelClass = Str::studly($this->nameOfTheModelClass);
    }

    /**
     * Generates the CRUD class file
     *
     * @return void
     * 
     */

     
    protected function generateLivewireIndex()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/custom.livewire.index.stub');
        $fileDestination = base_path('/app/Http/Livewire/'.Str::kebab($this->nameOfTheModelClass).'s/index.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This class file already exists: index.php');
            $this->info('Aborting class file creation.');
          return false;
        }

        // Get the original string content of the file
        $fileOriginalString = $this->file->get($fileOrigin);

        // Replace the strings specified in the array sequentially
        $replaceFileOriginalString = Str::replaceArray('{{}}',
            [
                //NAMESPACE
                Str::kebab($this->nameOfTheModelClass), 

                $this->nameOfTheModelClass, // Name of the model class 

                // DELETE MODEL 
                $this->nameOfTheModelClass,// Name of the model class
             
                //DELETE SELECTED 
                $this->nameOfTheModelClass,// Name of the model class

                //MERGE SELECTED
                $this->nameOfTheModelClass,// Name of the model class



                // RENDER SEARCH
                $this->nameOfTheModelClass, // Name of the model class
                $this->nameOfTheModelClass, // Name of the model class

                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the vaRiable
                $this->var6,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var21,  // Name of the variable
                
                 
                Str::kebab($this->nameOfTheModelClass),  //RENDER RETURN
            ],
            $fileOriginalString
        );

        // Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString);
        $this->info('Livewire class file created: ' . $fileDestination);
    }

     

    /**
     * generateLivewireViewFile
     *
     * @return void
     */
    // INDEX LIVEWIRE VIEW
    protected function generateLivewireIndexView()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/custom.livewire.index.view.stub');
        $fileDestination = base_path('/resources/views/livewire/' . Str::kebab($this->nameOfTheClass) . 's/index.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: index.php');
            $this->info('Aborting view file creation.');
          return false;
        }

            // Get the original string content of the file
            $fileOriginalString = $this->file->get($fileOrigin);

            // Replace the strings specified in the array sequentially
            $replaceFileOriginalString = Str::replaceArray('{{}}',
            [ 
                
                //CREATE ROUTE
                Str::kebab($this->nameOfTheModelClass),

                // TABLE ROW ONE
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
                $this->var6,  // Name of the variable
                $this->var6,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var15,  // Name of the variable
            
                // TABLE ROW TWO
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
                $this->var6,  // Name of the variable
                $this->var6,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var15,  // Name of the variable
               
                
                // TABLE ROW THREE FOREACH
                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the vaRiable
                $this->var6,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var15,  // Name of the variable
                 
                // foler name
                Str::kebab($this->nameOfTheModelClass).'s', // Name of the variable
            ],
            $fileOriginalString
            );


     // Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString); 
         // Copy file to destination
        // $this->file->copy($fileOrigin, $fileDestination);
        $this->info('Livewire view file created: ' . $fileDestination);
    }


    //CREATTE LIVEWIRE VIEW 
    protected function generateLivewireCreateView()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/custom.livewire.create.view.stub');
        $fileDestination = base_path('/resources/views/livewire/' . Str::kebab($this->nameOfTheClass) . 's/create.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: create.php');
            $this->info('Aborting view file creation.');
          return false;
        }

            // Get the original string content of the file
            $fileOriginalString = $this->file->get($fileOrigin);

            // Replace the strings specified in the array sequentially
            $replaceFileOriginalString = Str::replaceArray('{{}}',
            [ 
                
                
                // variabele
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
                $this->var6,  // Name of the variable
                $this->var6,  // Name of the variable
                $this->var6,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var21,  // Name of the variable
                $this->var21,  // Name of the variable
                $this->var21,  // Name of the variable

                



                 
              ],
            $fileOriginalString
            );


     // Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString); 
         // Copy file to destination
        // $this->file->copy($fileOrigin, $fileDestination);
        $this->info('Livewire view file created: ' . $fileDestination);
    }

    // EDIT LIVEWIRE VIEW
    protected function generateLivewireEditView()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/custom.livewire.edit.view.stub');
        $fileDestination = base_path('/resources/views/livewire/' . Str::kebab($this->nameOfTheClass) . 's/edit.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: edit.php');
            $this->info('Aborting view file creation.');
          return false;
        }

            // Get the original string content of the file
            $fileOriginalString = $this->file->get($fileOrigin);

            // Replace the strings specified in the array sequentially
            $replaceFileOriginalString = Str::replaceArray('{{}}',
            [ 
                
                
                // variabele
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
                $this->var6,  // Name of the variable
                $this->var6,  // Name of the variable
                $this->var6,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var21,  // Name of the variable
                $this->var21,  // Name of the variable
                $this->var21,  // Name of the variable
                 
              ],
            $fileOriginalString
            );


     // Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString); 
         // Copy file to destination
        // $this->file->copy($fileOrigin, $fileDestination);
        $this->info('Livewire view file created: ' . $fileDestination);
    }


    protected function generateController()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/controllerCrud.stub');
        $fileDestination = base_path('/app/Http/Controllers/'. $this->nameOfTheModelClass . 'Controller.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This Controller file already exists: ' . $this->nameOfTheModelClass . 'Controller.php');
            $this->info('Aborting Controller file creation.');
          return false;
        }

         // Get the original string content of the file
         $fileOriginalString = $this->file->get($fileOrigin);

         // Replace the strings specified in the array sequentially
         $replaceFileOriginalString = Str::replaceArray('{{}}',
         [  
              
           
            $this->nameOfTheModelClass, // Name of the model class 
            $this->nameOfTheModelClass, // Name of the model class 

            //index
            Str::kebab( $this->nameOfTheModelClass),  // Name of the class 

            //create
            Str::kebab( $this->nameOfTheModelClass),  // Name of the class 

            //edit
            Str::kebab( $this->nameOfTheModelClass),  // Name of the class 
            $this->nameOfTheModelClass,  // Name of the class 
           
           
            Str::kebab( $this->nameOfTheModelClass),  // Name of the class 
            Str::kebab( $this->nameOfTheModelClass),  // Name of the class 

            //show
            Str::kebab( $this->nameOfTheModelClass),  // Name of the class 
            $this->nameOfTheModelClass,  // Name of the class          
            
            //return 
            Str::kebab( $this->nameOfTheModelClass),  // Name of the class  
            Str::kebab( $this->nameOfTheModelClass),  // Name of the class  
         ],
         $fileOriginalString
         );


  // Put the content into the destination directory
     $this->file->put($fileDestination, $replaceFileOriginalString);  
     $this->info('CONTROLER  FILE CREATED : ' . $fileDestination);
    }

 
    protected function generateIndexView()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/index_views.stub'); 
        $fileDestination = base_path('/resources/views/'.Str::kebab($this->nameOfTheModelClass) .'s/index.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: index.blade.php');
            $this->info('Aborting view file creation.');
          return false;
        }

         // Get the original string content of the file
         $fileOriginalString = $this->file->get($fileOrigin);
         // Replace the strings specified in the array sequentially
         $replaceFileOriginalString = Str::replaceArray('{{}}',
         [ 
              
            Str::kebab($this->nameOfTheModelClass)
         ],
         $fileOriginalString
         );
  // Put the content into the destination directory
     $this->file->put($fileDestination, $replaceFileOriginalString);  
     $this->info('View file created: ' . $fileDestination);
    }

    protected function generateCreateView()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/create_views.stub'); 
        $fileDestination = base_path('/resources/views/'.Str::kebab($this->nameOfTheModelClass) .'s/create.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: create.blade.php');
            $this->info('Aborting view file creation.');
          return false;
        }

         // Get the original string content of the file
         $fileOriginalString = $this->file->get($fileOrigin);
         // Replace the strings specified in the array sequentially
         $replaceFileOriginalString = Str::replaceArray('{{}}',
         [ 
              
            Str::kebab($this->nameOfTheModelClass)
         ],
         $fileOriginalString
         );
  // Put the content into the destination directory
     $this->file->put($fileDestination, $replaceFileOriginalString);  
     $this->info('View file created: ' . $fileDestination);
    }


    protected function generateEditView()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/edit_views.stub'); 
        $fileDestination = base_path('/resources/views/'.Str::kebab($this->nameOfTheModelClass) .'s/edit.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: edit.blade.php');
            $this->info('Aborting view file creation.');
          return false;
        }

         // Get the original string content of the file
         $fileOriginalString = $this->file->get($fileOrigin);
         // Replace the strings specified in the array sequentiallyss
         $replaceFileOriginalString = Str::replaceArray('{{}}',
         [ 
              
            Str::kebab($this->nameOfTheModelClass), // Name of the  
            Str::kebab($this->nameOfTheModelClass)
         ],
         $fileOriginalString
         );
  // Put the content into the destination directory
     $this->file->put($fileDestination, $replaceFileOriginalString);  
     $this->info('View file created: ' . $fileDestination);
    }

    protected function generateShowView()
    {
 
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/show_views.stub'); 
        $fileDestination = base_path('/resources/views/'.Str::kebab($this->nameOfTheModelClass) .'s/show.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: show.blade.php');
            $this->info('Aborting view file creation.');
          return false;
        }

         // Get the original string content of the file
         $fileOriginalString = $this->file->get($fileOrigin);
         // Replace the strings specified in the array sequentially
         $replaceFileOriginalString = Str::replaceArray('{{}}',
         [ 
            Str::kebab($this->nameOfTheModelClass),  
            Str::kebab($this->nameOfTheModelClass)
         ],
         $fileOriginalString
         );
  // Put the content into the destination directory
     $this->file->put($fileDestination, $replaceFileOriginalString);  
     $this->info('View file created: ' . $fileDestination);
    }

























    protected function generateViewsCreateFile()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/views.stub');
        $fileDestination = base_path('/resources/views/'. Str::kebab($this->nameOfTheModelClass) .'s/create.blade.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This view file already exists: create.blade.php');
            $this->info('Aborting created view');
        }
        $fileOriginalString = $this->file->get($fileOrigin);
      
        $replaceFileOriginalString = Str::replaceArray('{{}}',
        [ 
             
           Str::kebab($this->nameOfTheModelClass)
        ],
        $fileOriginalString
        );
        // Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString);  
        $this->info('View created: ' . $fileDestination);
    }



    protected function generateRouteFile()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/routes.stub');
        $fileDestination = base_path('/routes/generateRoutes/' . Str::kebab($this->nameOfTheClass) . '.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This route file already exists: ' . Str::kebab($this->nameOfTheClass) . '.php');
            $this->info('Aborting route file creation.');
          return false;
        }

            // Get the original string content of the file
            $fileOriginalString = $this->file->get($fileOrigin);

            // Replace the strings specified in the array sequentially
            $replaceFileOriginalString = Str::replaceArray('{{}}',
            [    
            $this->nameOfTheModelClass, // Name of the model class
            Str::kebab( $this->nameOfTheClass),          
            $this->nameOfTheModelClass,   
                
            ],
            $fileOriginalString
            );


          // Put the content into the destination directory
             $this->file->put($fileDestination, $replaceFileOriginalString);  
             $this->info('Route file created  : ' . $fileDestination);
    }
 

    // CREATE THE MODEL CLASS
    
    protected function generateLivewireCreate()
    {
        // Set the origin and destination for the livewire class file
        $fileOrigin = base_path('/stubs/CRUDFIVE/custom.livewire.create.stub');
        $fileDestination = base_path('/app/Http/Livewire/'.Str::kebab($this->nameOfTheModelClass).'s/create.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('This class file already exists: ' . $this->nameOfTheClass . 'create.php');
            $this->info('Aborting class file creation.');
          return false;
        }

        // Get the original string content of the file
        $fileOriginalString = $this->file->get($fileOrigin);

        // Replace the strings specified in the array sequentially
        $replaceFileOriginalString = Str::replaceArray('{{}}',
            [
                 //NAMESPACE
                 Str::kebab($this->nameOfTheModelClass), 

                $this->nameOfTheModelClass, // Name of the model class 
                
                //VARIABLES DECLARATION
                $this->var1, // Name of the variable
                $this->var2, // Name of the variable
                $this->var3, // Name of the variable
                $this->var4,  // Name of the variable
                $this->var5,  // Name of the variable
                $this->var6,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var21,  // Name of the variable
                
                //VARIABLES VALIDATION RULES
                $this->var1,  // Name of the validation
                $this->var2,  // Name of the validation
                $this->var3,  // Name of the validation
                $this->var4,  // Name of the validation
                $this->var5,  // Name of the validation 
                $this->var6,  // Name of the validation
                $this->var7,  // Name of the validation
                $this->var8,  // Name of the validation
                $this->var9,  // Name of the validation
                $this->var10,  // Name of the validation
                $this->var11,  // Name of the validation
                $this->var12,  // Name of the validation
                $this->var13,  // Name of the validation
                $this->var14,  // Name of the validation
                $this->var15,  // Name of the validation
                $this->var16,  // Name of the validation
                $this->var17,  // Name of the validation
                $this->var18,  // Name of the validation
                $this->var19,  // Name of the validation
                $this->var20,  // Name of the validation
                $this->var21,  // Name of the validation

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
                $this->var6,  // Name of the variable
                $this->var6,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var7,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var8,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var9,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var10,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var11,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var12,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var13,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var14,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var15,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var16,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var17,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var18,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var19,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var20,  // Name of the variable
                $this->var21,  // Name of the variable
                $this->var21,  // Name of the variable

 
                //CREATE METHOD
                $this->nameOfTheModelClass,//  FIRST
                $this->nameOfTheModelClass, // SESSION MEESAGE
                Str::kebab($this->nameOfTheModelClass), //RETURN TO INDEX
            

                //RENDER METHOD
                Str::kebab($this->nameOfTheModelClass), 
                //RETURN TO INDEX
                Str::kebab($this->nameOfTheModelClass), 
            ],
            $fileOriginalString
        );

        // Put the content into the destination directory
        $this->file->put($fileDestination, $replaceFileOriginalString);
        $this->info('Livewire class file created: ' . $fileDestination);
    }



 // CREATE THE MODEL CLASS
    
 protected function generateLivewireEdit()
 {
     // Set the origin and destination for the livewire class file
     $fileOrigin = base_path('/stubs/CRUDFIVE/custom.livewire.edit.stub');
     $fileDestination = base_path('/app/Http/Livewire/'.Str::kebab($this->nameOfTheModelClass).'s/edit.php');

     if ($this->file->exists($fileDestination)) {
         $this->info('This class file already exists: ' . $this->nameOfTheClass . 'edit.php');
         $this->info('Aborting class file creation.');
       return false;
     }

     // Get the original string content of the file
     $fileOriginalString = $this->file->get($fileOrigin);

     // Replace the strings specified in the array sequentially
     $replaceFileOriginalString = Str::replaceArray('{{}}',
         [
              //NAMESPACE
              Str::kebab($this->nameOfTheModelClass), 

             $this->nameOfTheModelClass, // Name of the model class              

             //VARIABLES DECLARATION
            $this->nameOfTheModelClass,

            $this->var1, // Name of the variable
            $this->var2, // Name of the variable
            $this->var3, // Name of the variable
            $this->var4,  // Name of the variable
            $this->var5,  // Name of the variable
            $this->var6,  // Name of the variable
            $this->var7,  // Name of the variable
            $this->var8,  // Name of the variable
            $this->var9,  // Name of the variable
            $this->var10,  // Name of the variable
            $this->var11,  // Name of the variable
            $this->var12,  // Name of the variable
            $this->var13,  // Name of the variable
            $this->var14,  // Name of the variable
            $this->var15,  // Name of the variable
            $this->var16,  // Name of the variable
            $this->var17,  // Name of the variable
            $this->var18,  // Name of the variable
            $this->var19,  // Name of the variable
            $this->var20,  // Name of the variable
            $this->var21,  // Name of the variable
            
                          
             //VARIABLES VALIDATION RULES
             $this->var1, // Name of the variable
             $this->var2, // Name of the variable
             $this->var3, // Name of the variable
             $this->var4,  // Name of the variable
             $this->var5,  // Name of the variable
             $this->var6,  // Name of the variable
             $this->var7,  // Name of the variable
             $this->var8,  // Name of the variable
             $this->var9,  // Name of the variable
             $this->var10,  // Name of the variable
             $this->var11,  // Name of the variable
             $this->var12,  // Name of the variable
             $this->var13,  // Name of the variable
             $this->var14,  // Name of the variable
             $this->var15,  // Name of the variable
            $this->var16,  // Name of the variable
            $this->var17,  // Name of the variable
            $this->var18,  // Name of the variable
            $this->var19,  // Name of the variable
            $this->var20,  // Name of the variable
            $this->var21,  // Name of the variable


             //LOAD DATA
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
            $this->var6,  // Name of the variable
            $this->var6,  // Name of the variable
            $this->var7,  // Name of the variable
            $this->var7,  // Name of the variable
            $this->var8,  // Name of the variable
            $this->var8,  // Name of the variable
            $this->var9,  // Name of the variable
            $this->var9,  // Name of the variable
            $this->var10,  // Name of the variable
            $this->var10,  // Name of the variable
            $this->var11,  // Name of the variable
            $this->var11,  // Name of the variable
            $this->var12,  // Name of the variable
            $this->var12,  // Name of the variable
            $this->var13,  // Name of the variable
            $this->var13,  // Name of the variable
            $this->var14,  // Name of the variable
            $this->var14,  // Name of the variable
            $this->var15,  // Name of the variable
            $this->var15,  // Name of the variable
            $this->var16,  // Name of the variable
            $this->var16,  // Name of the variable
            $this->var17,  // Name of the variable
            $this->var17,  // Name of the variable
            $this->var18,  // Name of the variable
            $this->var18,  // Name of the variable
            $this->var19,  // Name of the variable
            $this->var19,  // Name of the variable
            $this->var20,  // Name of the variable
            $this->var20,  // Name of the variable
            $this->var21,  // Name of the variable
            $this->var21,  // Name of the variable


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
            $this->var6,  // Name of the variable
            $this->var6,  // Name of the variable
            $this->var7,  // Name of the variable
            $this->var7,  // Name of the variable
            $this->var8,  // Name of the variable
            $this->var8,  // Name of the variable
            $this->var9,  // Name of the variable
            $this->var9,  // Name of the variable
            $this->var10,  // Name of the variable
            $this->var10,  // Name of the variable
            $this->var11,  // Name of the variable
            $this->var11,  // Name of the variable
            $this->var12,  // Name of the variable
            $this->var12,  // Name of the variable
            $this->var13,  // Name of the variable
            $this->var13,  // Name of the variable
            $this->var14,  // Name of the variable
            $this->var14,  // Name of the variable
            $this->var15,  // Name of the variable
            $this->var15,  // Name of the variable
            $this->var16,  // Name of the variable
            $this->var16,  // Name of the variable
            $this->var17,  // Name of the variable
            $this->var17,  // Name of the variable
            $this->var18,  // Name of the variable
            $this->var18,  // Name of the variable
            $this->var19,  // Name of the variable
            $this->var19,  // Name of the variable
            $this->var20,  // Name of the variable
            $this->var20,  // Name of the variable
            $this->var21,  // Name of the variable
            $this->var21,  // Name of the variable
            


             //UPDATE METHOD
             $this->nameOfTheModelClass,//  FIRST
             $this->nameOfTheModelClass, // SESSION MEESAGE
             Str::kebab($this->nameOfTheModelClass), //RETURN TO INDEX

             //MOUNT METHOD
             $this->nameOfTheModelClass, //parameter one
             Str::kebab($this->nameOfTheModelClass), //parameter two
             
             Str::kebab($this->nameOfTheModelClass), 

             //RENDER METHOD
             Str::kebab($this->nameOfTheModelClass), 
         ],
         $fileOriginalString
     );

     // Put the content into the destination directory
     $this->file->put($fileDestination, $replaceFileOriginalString);
     $this->info('Livewire class file created: ' . $fileDestination);
 }













            protected function makeDir(){ 
                $folder =  Str::kebab($this->nameOfTheModelClass).'s'; 
                $path = base_path('resources/views/' . $folder );
                File::makeDirectory($path, 0777, true, true); 
                $folder =  Str::kebab($this->nameOfTheModelClass).'s'; 
                $path = base_path('resources/views/livewire/' . $folder );
                File::makeDirectory($path, 0777, true, true); 
                $folder =  Str::kebab($this->nameOfTheModelClass).'s'; 
                $path = base_path('/app/Http/Livewire/' . $folder );
                File::makeDirectory($path, 0777, true, true); 
            }






}