<div class= "row">
	<div class= "col-sm-3" >
	    
	</div>


	<div class= "col-sm-6" id= "main">
		<?php foreach($categorys as $category) : ?>
		<div class= "article">
			<h1 id= "article_title"><?= $category['title'];?></h1>
			<h5 id= "article_category"><?= "Category : ".$category['category'];?></h5>
			<hr>
			<div id= "article_body">
				<?= nl2br($category['body']);?>
			</div>
			<hr>
			<div id= "delete_article" class= "row">
				<a class= "col-sm-6" href= <?= "/posts/delete/".$category['id'] ;?> >削除</a>
				<a class= "col-sm-6" href= <?= "/posts/preedit/".$category['id'] ;?> >編集</a>
			</div>
		</div>
		<?php endforeach?>
		<div id= "pgg">
		<ul class= "pager">
			
			<li class= "previous"><?= $this->Paginator->prev('prev'); ?></li>
			
			<li class= "next>"<?= $this->Paginator->next('next>'); ?></li>
			
		</ul>

		<?= $this->Paginator->numbers(); ?></li>
		</div>
	</div>




	<div class= "col-sm-3">
	    <div id= "content-right">
	    
	       <div>カテゴリー一覧</div>
	       <ul>
	       <?php foreach($category_names as $category_name) : ?>
	       		<li><?=  "<a href= /posts/catelist/".$category_name[0].">";?><i class= "glyphicon glyphicon-pencil"><?= $category_name[0];?></i></a></li>
	       	<?php endforeach?>
	       </ul>
	       
	       <div><a href= "/posts/preadd">記事追加</a></div>
	       <div><a href= "/posts">ホームに戻る</a></div>
	    </div>
	</div>

</div>