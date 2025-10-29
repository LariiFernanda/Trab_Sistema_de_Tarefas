<?php $__env->startSection('title','Categorias'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold">Categorias</h1>
  <a href="<?php echo e(route('categorias.create')); ?>" class="px-4 py-2 bg-blue-600 text-white rounded">Nova Categoria</a>
</div>

<div class="bg-white rounded shadow">
  <table class="min-w-full divide-y divide-slate-200">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-4 py-2 text-left">Nome</th>
        <th class="px-4 py-2 text-left">Tarefas</th>
        <th class="px-4 py-2"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-200">
      <?php $__empty_1 = true; $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
          <td class="px-4 py-2"><?php echo e($c->nome); ?></td>
          <td class="px-4 py-2"><?php echo e($c->tarefas_count); ?></td>
          <td class="px-4 py-2 text-right space-x-2">
            <a href="<?php echo e(route('categorias.edit',$c)); ?>" class="px-3 py-1 border rounded">Editar</a>
            <form action="<?php echo e(route('categorias.destroy',$c)); ?>" method="POST" class="inline">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button class="px-3 py-1 border rounded text-red-700">Excluir</button>
            </form>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td class="px-4 py-4" colspan="3">Sem registros.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<div class="mt-4"><?php echo e($categorias->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\OneDrive\Área de Trabalho\trabGe_Tarefas\Gerenc_Tarefas\resources\views/categorias/index.blade.php ENDPATH**/ ?>