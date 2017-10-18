@if (count($errors))
     
                @foreach ($errors->all() as $error)
                <script>
                    $(function() {
                    Materialize.toast('{{$error}}', 4000);
                    });
                    </script>
                
                @endforeach
           
    @endif