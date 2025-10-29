<?php $__env->startSection('title', $tarefa->exists ? 'Editar Tarefa' : 'Nova Tarefa'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-semibold mb-4">
  <?php echo e($tarefa->exists ? 'Editar' : 'Nova'); ?> Tarefa
</h1>

<form method="POST" action="<?php echo e($tarefa->exists ? route('tarefas.update',$tarefa) : route('tarefas.store')); ?>" class="bg-white p-4 rounded shadow max-w-2xl">
  <?php echo csrf_field(); ?>
  <?php if($tarefa->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

  <div class="mb-3">
    <label class="block mb-1 text-sm font-medium">Categoria</label>
    <select name="categoria_id" class="w-full border rounded px-3 py-2">
      <option value="" disabled <?php echo e(old('categoria_id',$tarefa->categoria_id) ? '' : 'selected'); ?>>Selecione...</option>
      <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($cat->id); ?>" <?php if(old('categoria_id',$tarefa->categoria_id)==$cat->id): echo 'selected'; endif; ?>><?php echo e($cat->nome); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-600 text-sm mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>

  <div class="mb-3">
    <label class="block mb-1 text-sm font-medium">Título</label>
    <input type="text" name="titulo" value="<?php echo e(old('titulo',$tarefa->titulo)); ?>" class="w-full border rounded px-3 py-2">
    <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-600 text-sm mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>

  <div class="mb-3">
    <label class="block mb-1 text-sm font-medium">Descrição</label>
    <textarea name="descricao" rows="4" class="w-full border rounded px-3 py-2"><?php echo e(old('descricao',$tarefa->descricao)); ?></textarea>
    <?php $__errorArgs = ['descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-600 text-sm mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>

  <div class="mb-4">
    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="concluida" value="1" <?php echo e(old('concluida',$tarefa->concluida) ? 'checked' : ''); ?>>
      <span>Concluída</span>
    </label>
  </div>

  <div class="flex gap-2">
    <a href="<?php echo e(route('tarefas.index')); ?>" class="px-4 py-2 border rounded">Cancelar</a>
    <button class="px-4 py-2 bg-blue-600 text-white rounded">
      <?php echo e($tarefa->exists ? 'Salvar' : 'Criar'); ?>

    </button>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\OneDrive\Área de Trabalho\trabGe_Tarefas\Gerenc_Tarefas\resources\views/tarefas/form.blade.php ENDPATH**/ ?>