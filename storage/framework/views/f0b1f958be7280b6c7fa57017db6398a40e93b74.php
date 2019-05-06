<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('sidebar'); ?>
    ##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##
    <p>这将追加到主布局的侧边栏。</p>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
   
  
   
    
        
    
        
    

   

   <?php
        echo "元素php111";
   ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>