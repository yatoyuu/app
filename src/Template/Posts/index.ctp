<div class= "row">
	<div class= "col-sm-3" id= "side-left">
	    <div id= "content-left">
	       <p> <i class= "glyphicon glyphicon-tag"></i> profile</p>
	       <p><img src= "/img/獣.jpeg" width= "80" height= "80">  Name</p>
	       <ul>
	           <li>性別 : </li>
	           <li>誕生日 : </li>
	           <li>血液型 : </li>
	           <li>地域 : </li>
	       </ul>
	    </div>
	</div>


	<div class= "col-sm-6" id= "main">
		<?php foreach($posts as $post) : ?>
		<div class= "article">
			<h1 id= "article_title"><?= $post['title'];?></h1>
			<h5 id= "article_category"><?= "Category : ".$post['category'];?></h5>
			<hr>
			<div id= "article_body">
				<?= nl2br($post['body']);?>
			</div>
			<hr>
			<div id= "delete_article" class= "row">
				<a class= "col-sm-6" href= <?= "/posts/delete/".$post['id'] ;?> >削除</a>
				<a class= "col-sm-6" href= <?= "/posts/preedit/".$post['id'] ;?> >編集</a>
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




	<div class= "col-sm-3" id= "side-right">
	    <div id= "content-right">
	    
	       <div>カテゴリー一覧</div>
	       <ul>
	       <?php foreach($categorys as $category) : ?>
	       	<?php if($category[0] == "") {continue;} ?>
	       		<li><?=  "<a href= /posts/catelist/".$category[0].">";?><i class= "glyphicon glyphicon-pencil"><?= $category[0];?></i></a></li>
	       	
	       	<?php endforeach?>
	       </ul>
	       
	       <div><a href= "/posts/preadd">記事追加</a></div>
	       <div><a href= "/posts">ホームに戻る</a></div>
	    </div>
	</div>

</div>