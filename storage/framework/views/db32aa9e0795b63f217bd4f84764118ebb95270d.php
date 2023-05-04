<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
               <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?>

                </div>
               
            </div>
            
        </div>
       
    </div>
    <br>
    <a href="<?php echo e(route('addStudentForm')); ?>" class="btn btn-success" id="addStudent" style="width:117px;">Add Student</a>

    <button type="button" class="btn btn-success" id="addStudentMark" style="width:170px;">Add Student Marks</button>
</div>
<div class="container">
    Student Details

    <table class="table table-bordered">

<thead>

<tr>

<th>Id</th>

<th>Name</th>

<th>DOB</th>

<th>Gender</th>

<th>Mobile</th>

<th>Email</th>

<th>Country</th>

<th>State</th>

<th>Actions</th>

</tr>

</thead>

<tbody>


<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>

<td><?php echo e($s->id); ?></td>

<td><?php echo e($s->name); ?></td>

<td><?php echo e($s->DOB); ?></td>

<td><?php echo e($s->gender); ?></td>

<td><?php echo e($s->mobile_number); ?></td>

<td><?php echo e($s->email); ?></td>

<td><?php echo e($s->country->name); ?></td>

<td><?php echo e($s->state->name); ?></td>

<td><a class="btn btn-success" href="<?php echo e(route('students.edit',$s->id)); ?>">Edit</a></td>
    
<td> <a class="btn btn-danger" href="<?php echo e(route('students.delete',$s->id)); ?>">Delete</a</td>



</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>

</table>
</div>


<!-- <div class="container">
    Student Marks -->

    <!-- <table class="table table-bordered">

<thead>

<tr>

<th>Id</th>

<th>Name</th>

<th>Maths</th>

<th>Science</th>

<th>Computer</th>

<th>Term</th>

<th>Total</th>

</tr>

</thead>

<tbody>


<?php $__currentLoopData = $student_mark; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>

<td><?php echo e($sm->id); ?></td>

<td><?php echo e($sm->name); ?></td>

<td><?php echo e($sm->maths); ?></td>

<td><?php echo e($sm->science); ?></td>

<td><?php echo e($sm->computer); ?></td>

<td><?php echo e($sm->term); ?></td>

<td><?php echo e($sm->total); ?></td>



</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>

</table> -->
<!-- </div> -->




     
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<!-- Student Mark Popup -->

<div class="modal fade modal-lg" id="studentMarkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Student Mark')); ?></div>
               
                <div class="card-body">
                    <form method="POST" id="student_mark" action="<?php echo e(route('students.addMark')); ?>">
                       <?php echo csrf_field(); ?>

                        

                        

                        

                        <div class="row mb-3">
                            <label for="student" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Student')); ?></label>

                            <div class="col-md-6">
                               <select class="form-control" id="name" name="name">
                               <option value="">Select a Student</option>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($s->name); ?>"><?php echo e($s->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </select>

                                <?php $__errorArgs = ['student'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="term" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Term')); ?></label>

                            <div class="col-md-6">
                               <select class="form-control" id="term" name="term">
                               <option value="">Select a Term</option>
                              
                                <option value="First">First</option>
                                <option value="Second">Second</option>
                                <option value="Third">Third</option>
                               </select>

                                <?php $__errorArgs = ['term'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="maths" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Maths')); ?></label>

                            <div class="col-md-6">
                                <input id="maths" type="text" class="form-control <?php $__errorArgs = ['maths'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="maths" value="<?php echo e(old('maths')); ?>" required autocomplete="maths">

                                <?php $__errorArgs = ['maths'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="science" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Science')); ?></label>

                            <div class="col-md-6">
                                <input id="science" type="text" class="form-control <?php $__errorArgs = ['science'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="science" value="<?php echo e(old('science')); ?>" required autocomplete="science">

                                <?php $__errorArgs = ['science'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="computer" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Computer')); ?></label>

                            <div class="col-md-6">
                                <input id="computer" type="text" class="form-control <?php $__errorArgs = ['computer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="computer" value="<?php echo e(old('computer')); ?>" required autocomplete="computer">

                                <?php $__errorArgs = ['computer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Save')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

      </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\student\resources\views/home.blade.php ENDPATH**/ ?>