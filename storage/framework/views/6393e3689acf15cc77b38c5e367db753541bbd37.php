<?php $__env->startSection("title"); ?>
        request测试用页面
<?php $__env->stopSection(); ?>


<?php $__env->startSection("sidebar"); ?>

    不集成common 页面的内容，这是request 页面自己的内容
<?php $__env->stopSection(); ?>


<?php $__env->startSection("content"); ?>
    <form id="formID">

        <div>name:<input type="text" name="name"></div>

        <div>id:<input type="number" name="id"></div>

        <div>content:<input type="text" name="content"></div>

        <div><input type="button" value="测试提交" class="submit"></div>
    </form>
<?php $__env->stopSection(); ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function(){
        $(".submit").click(function(){
            var data=$("#formID").serialize();
           $.post("<?php echo e(url('get')); ?>",data,function(e){
                alert(1111);
           });
        });
    })
</script>
<?php echo $__env->make('common', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>