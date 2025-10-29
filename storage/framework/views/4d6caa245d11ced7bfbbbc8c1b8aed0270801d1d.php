<?php $__env->startSection('title', $categoria->exists ? 'Editar Categoria' : 'Nova Categoria'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-semibold mb-4">
  <?php echo e($categoria->exists ? 'Editar' : 'Nova'); ?> Categoria
</h1>

<form method="POST" action="<?php echo e($categoria->exists ? route('categorias.update',$categoria) : route('categorias.store')); ?>" class="bg-white p-4 rounded shadow max-w-lg">
  <?php echo csrf_field(); ?>
  <?php if($categoria->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

  <label class="block mb-2 text-sm font-medium">Nome</label>
  <input type="text" name="nome" value="<?php echo e(old('nome',$categoria->nome)); ?>" class="w-full border rounded px-3 py-2 mb-3">
  <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-600 text-sm mb-2"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

  <div class="flex gap-2">
    <a href="<?php echo e(route('categorias.index')); ?>" class="px-4 py-2 border rounded">Cancelar</a>
    <button class="px-4 py-2 bg-blue-600 text-white rounded">
      <?php echo e($categoria->exists ? 'Salvar' : 'Criar'); ?>

    </button>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\OneDrive\Área de Trabalho\trabGe_Tarefas\Gerenc_Tarefas\resources\views/categorias/form.blade.php ENDPATH**/ ?>