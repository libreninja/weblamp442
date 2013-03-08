<?php namespace Controller;
/**
 * word counter app
 *
 * @author Josh Benner
 **/

/**
 * Loader
 **/
class Load
{
    /**
     * load a view
     **/
    function view( $filename, $data = null )
    {
        if ( is_array( $data ) ) {
            extract( $data );
        }

        include 'Src/View/' . $filename;
    }
}
?>
