<div>

<?php 
    $re_body = $datas['body'];
    for($i = 1; $i <= $datas['count']; $i++) : 
?>
    
    <?php
        $image_no = "image".$i;
        $image = $datas[$image_no];

        $regex1 = "/^.+\.jpeg$/";
        $regex2 = "/^.+\.jpg$/";
        $regex3 = "/^.+\.gif$/";
        $regex4 = "/^.+\.png$/";
        if(!$image) {continue;}
        $file_name = $image['name'];
        
        if (!(preg_match($regex1,$file_name) || preg_match($regex2,$file_name) || preg_match($regex3,$file_name) || preg_match($regex4,$file_name))){continue;}

        $tmp_name = $image['tmp_name'];
        echo $tmp_name;
        $dir = 'webroot/img/';
        $move_after = $dir.$file_name;
        move_uploaded_file($tmp_name,$move_after);

        $regexp = "/\[\s*" .$file_name ."\s*\]/";
        
        $uploaded = '/img/'.$file_name;
        

        $re_body = preg_replace($regexp,"<img src=". $uploaded." width= '100' height= '100'>",$re_body);

    ?>
    
<?php endfor ;?>
    <h3>このように表示されます</h3>
    <hr>
    <div class= "row" >
        <div class= "col-sm-3"></div>
        <div class= "col-sm-6">
            <div class= "article">
                <h1 id= "article_title"><?= $datas['title'];?></h1>
                <h5 id= "article_category"><?= "Category : ".$datas['category'];?></h5>
                <hr>
                <div id= "article_body">
                    <?= nl2br($re_body);?>
                </div>
                <hr>
                <div id= "delete_article">
                    削除
                </div>
            </div>
        </div>
        <div class= "col-sm-3"></div>
    <div>

    <?= $this->Form->create(null,['type' => 'file', 'url' => ['controller' => 'Posts','action' => 'add']]) ?>
    
    
    <?php
        
        echo $this->Form->hidden('title',['value' => $datas['title']]);
        
        echo $this->Form->hidden('category',['value' => $datas['category']]);
        
        echo $this->Form->hidden('body',['value' => $re_body]);
        
    ?>
    
    <hr>
    <div class= "form-group">
        
        <?= $this->Form->button('Submit',['class' => 'btn btn-primary']) ?>
    </div>
    
    <?= $this->Form->end() ?>


    
    
</div>