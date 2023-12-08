<?php
    function load_all_reviews($id_pro){
        $sql = "SELECT * FROM review where id_pro='$id_pro' ";
        return pdo_query($sql);
    }
    function insert_review($id_pro,$id_user,$general_review,$detail_review){
        $sql = "INSERT INTO review (id_pro,id_user,general_review,detail_review) VALUES ('$id_pro', '$id_user','$general_review',$detail_review)";
        pdo_execute($sql);
    }