<div>
    <?php
        $re_body = $post['body'];
        $regex1  = "/<img src=\/img\/uplooaded_images\//";
        $regex2  = "/\swidth= '100' height= '100'>/";
        $re_body = preg_replace($regex1,"[",$re_body);
        $re_body = preg_replace($regex2,"]",$re_body);
    ?>
    <h3>Edit Post</h3>
    <?= $this->Form->create($post,['type' => 'file', 'url' => ['controller' => 'Posts','action' => 'editDisplay']]) ?>
    
    <div class= "form-group">
    <?php
        echo $this->Form->label('title','タイトル');
        echo $this->Form->textarea('title',['id' => 'title' ,'class' => 'form']);
        echo "<span class= 'help-block' style= 'color:red;'>please input</span>";
        echo $this->Form->input('category',['label' => [
            'text' => 'カテゴリー'
        ]]);
        echo $this->Form->label('article_content','本文');
        
        echo $this->Form->textarea('body',['id' => 'article_content',  'class' => 'form','value' => $re_body]);
        echo "<span class= 'help-block' style= 'color:red;'>please input</span>";
        echo $this->Form->hidden('count',['id' => 'imgcount',  'value' => 0]);
        echo $this->Form->hidden('id',[ 'value' => $post['id']]);

    ?>
    </div>
    <div class= "form-group" id= "forms">
        <p class= 'help-block' id= "img_vali" style= 'color:red;'>please input .png or .jpeg or .jpg or .gift</p>
        <?= $this->Form->input('image1',['type' => 'file','class' => 'imgbtn btn btn-primary','id' => 'image1','label' =>[
            'text' => '画像'
        ]]); ?>
        
        <p><?= $this->Form->button('画像を挿入',['class' => 'btn btn-info img_insert','id' => '1','type' => 'button']) ?></p>
    </div>
    <div class= "form-group">
        
        <?= $this->Form->button('Submit',['class' => 'btn btn-primary','id' => 'sub_btn']) ?>
    </div>
    
    <?= $this->Form->end() ?>
    <script src= "/js/jquery-3.1.1.min.js"></script>
    <script>
        $(function(){
            $('.help-block').hide();
            $('#sub_btn').prop('disabled',true);
            $('#img1_btn').prop('disabled',false);

            $('.form').blur(function(){
                if($(this).val() == ""){
                    $(this).next().show();
                    $('#sub_btn').prop('disabled',true);
                }else{
                    $(this).next().hide();
                }
                if($('#title').val() != "" && $('#article_content').val() != ""){
                    $('#sub_btn').prop('disabled',false);
                }
            });


            //--------------------------------------------------------------------
            /*$('.imgbtn').click(function(){
                $(this).clone().appendTo('#forms');
            });*/
            var count = 2;
            var regex1 = /^.+\.gif$/;
            var regex2 = /^.+\.jpg$/;
            var regex3 = /^.+\.png$/;
            var regex4 = /^.+\.jpeg$/;
            $('#forms').on('click','.imgbtn',function(){

                var image = "image" + count;
                var cloneimg = $(this).clone().attr({
                    name: image,
                    id: image
                });
                var cloneimg_btn = $('#1').clone().attr({
                    id: count
                });
                cloneimg_btn.prop('disabled',false);
                $('<p>').html(cloneimg).appendTo("#forms");
                $('<p>').html(cloneimg_btn).appendTo("#forms");
                $('#imgcount').val(count);
                count++;
            });
            $('#forms').on('click','.img_insert',function(){
                var body = $('#article_content').val();
                var img_no = '#image' + $(this).attr('id');
                var img_name = $(img_no).val();
                if(regex1.test(img_name) || regex2.test(img_name) || regex3.test(img_name) || regex4.test(img_name)){   
                    var tag = '[' + img_name + ']';
                    body += '\n' + tag + '\n';
                    $('#article_content').val(body);
                    $('#img_vali').hide();
                }else{
                    $('#img_vali').show();
                }

            });
           
        });
    </script>
</div>