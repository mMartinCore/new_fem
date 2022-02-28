if(auth()->user()->hasRole('Customer')){
            
       
        }elseif(auth()->user()->hasRole('Admin')){

       
        }else{

     

        }


@hasrole('Super|Admin')
@endrole