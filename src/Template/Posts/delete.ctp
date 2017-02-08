<div id= "delete_check">
    <h3>Delete Post</h3>
    <hr>
    <?= $this->Form->create($post) ?>
    <fieldset>
        <p>タイトル: <?= h($post->title); ?></p>
        <p>カテゴリー: <?= h($post->category); ?></p>
        <p>本文: <?= h($post->body); ?></p>
   </fieldset>
    <?= $this->Form->button('Submit',['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>