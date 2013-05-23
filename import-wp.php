<?php

/**

*/

function import( $args ) {
    //
    $out = array();
    extract( $args );

    foreach( $authors as $author ) {
        /**
        Author exist ?
        * is an existing email, ID

        */

        //
    }

    foreach( $attachments as $attachment ) {
        //
        /**
        Get image
        */

        /**
        Insert image
        */
    }


    /**
    DELTA BEFORE INSERTING POST
    */

    /**
    Have to update ?
    */

    /**
    Have to catch ghosts ?
    */

    /**
    Have to delete ghosts ?
    */

    /**
    Have to group for cron task ?
    */

    foreach( $posts as $post ) {
        /**
        Author exist ?
        * is an existing email, ID, or admin...

        */

        /**
        Insert post
        */
        //rebuild post array
        $postarr = array(
                 //
                 );
        $id = wp_insert_post( $postarr, true );

        if( is_wp_error( $id ) ) {
            //add error to output
            $out[] = $id;
        } else {
            //
            foreach( $imgs as $img ) {
                /**
                Already uploaded ?
                */
                if( ! is_int( $img ) ) { 
                    /**
                    Get image
                    */

                    /**
                    Insert image
                    */
                } else {
                    //get img ID
                }
                /**
                Link image
                */

                /**
                Is post thumbnail ?
                */
            }
            foreach( $metas as $meta ) {
                //
            }
            foreach( $terms as $term ) {
                //
            }
        }
    }

}