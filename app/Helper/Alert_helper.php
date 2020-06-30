<?php

    function show_alert(){

        if(Session::has('alert-success')){
            $alert = Session::get('alert-success');
            echo '<div class="snackbar-top snackbar-success">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }elseif(Session::has('alert-warning')){
            $alert = Session::get('alert-warning');
            echo '<div class="snackbar-top snackbar-warning">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }elseif(Session::has('alert-danger')){
            $alert = Session::get('alert-danger');
            echo '<div class="snackbar-top snackbar-danger">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }elseif(Session::has('alert-primary')){
            $alert = Session::get('alert-primary');
            echo '<div class="snackbar-top snackbar-primary">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }

        if(Session::has('full-alert')){
            $alert = Session::get('full-alert');
            echo '<div class="snackbar snackbar-dark">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }
        
        



    }

// function tes_alert(){
//     return "ini pesan dari alret";
// }