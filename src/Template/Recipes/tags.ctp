<div class="recipes index large-12 medium-12 columns content">
    <?= $this->Html->link(__('All Recipes'), ['controller' => 'recipes']) ?>
    <h3><?= $this->Misc->toList($tags) . __(' Recipes') ?></h3>
    <?php $col = 1 ?>
    <?php foreach ($recipes as $recipe): ?>
    <?php if($col === 1): // Create a div after the 3rd column?>
        <div class="row" style="border: 2px solid black">
    <?php endif; ?>
            <div class="col-md-3 jumbotron">
                <div class="row recipe-row">
<!--                    <div class="col-md-7"></div>-->
                    <div class="col-lg-6 pull-right"> 
                        <a href="recipes/view/<?= $recipe->id ?>.pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                        <a href="recipes/edit/<?= $recipe->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="recipes/delete/<?= $recipe->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a> 
                    </div>                    
                </div>
                <div class="name"><?= h($recipe->name) ?></div>
                <div class="row">
                <?php if($recipe->image !== ""): ?>
                    <div class="col-md-12">
                        <?= $this->Html->image($recipe->image, ['alt' => $recipe->name, 'url' => ['controller' => 'Recipes', 'action' => 'view', $recipe->id], 'height' => '250', 'width' => '250']) ?>
                    </div>
                <?php else: ?>
                    <div class="col-md-12">
                        <?= $this->Html->link($recipe->name, ['controller' => 'Recipes', 'action' => 'view', $recipe->id]) ?>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-md-12">Tags:  <?php foreach($this->Query->getTags($recipe->id) as $tag) {
                                                            echo $this->Html->link($tag, ['action' => 'tags', $tag]);
                                                            
                                                    }?> </div>  
                </div>
            </div> <!-- end col jumbotron -->
    <?php if($col === 4): ?>
        </div> <!-- end row -->
        <?php $col = 1;
          else:
            $col = $col + 1;
          endif; ?>
    <?php endforeach; ?>
    <?php if ($col !== 1): // Need to close the div in case there is not 3 columns in a row?>
        </div> <!--end row -->
    <?php endif; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
