<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php echo $__env->make("$prefix.layout.head", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header" data-kt-sticky="true"
                data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
                data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
                <?php echo $__env->make("$prefix.layout.head-menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!--end::Header-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                <!--begin::Sidebar-->
                <?php echo $__env->make("$prefix.layout.side-menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--end::Sidebar-->

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
                                <?php echo $__env->make("$prefix.layout.breadcrumbs", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container">
                                <div class="card card-flush">
                                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                                            <a href="<?php echo e(url("$segment/$folder/add")); ?>" class="btn btn-primary">Add</a>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <!-- Search -->
                                        <form method="get">
                                            <div class="row mb-5">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control form-control-solid ps-10"
                                                        id="keyword" name="keyword"
                                                        value="<?php echo e(@Request::get('keyword')); ?>" placeholder="Keywords">
                                                </div>
                                                <div class="col-md-2">
                                                    <select id="status" name="status"
                                                        class="form-select form-select-solid">
                                                        <option value="">All</option>
                                                        <option value="Y"
                                                            <?php if(@Request::get('status') == 'Y'): ?> selected <?php endif; ?>>Active
                                                        </option>
                                                        <option value="N"
                                                            <?php if(@Request::get('status') == 'N'): ?> selected <?php endif; ?>>Inactive
                                                        </option>
                                                        <option value="S"
                                                            <?php if(@Request::get('status') == 'S'): ?> selected <?php endif; ?>>Suspended
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Search -->

                                        <div class="hidden md:block mx-auto text-slate-500"><b>Showing
                                                <?php echo e($items->currentPage()); ?> to <?php echo e($items->total()); ?> of
                                                <?php echo e($items->total()); ?> entries</b></div>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                                id="kt_ecommerce_products_table">
                                                <thead>
                                                    <tr
                                                        class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="text-center min-w-5px">#</th>
                                                        <th class="text-center min-w-10px">Image</th>
                                                        <th class="text-left min-w-15px">Name</th>
                                                        <th class="text-left min-w-10px">Customer</th>
                                                        <th class="text-left min-w-10px">Email</th>
                                                        <th class="text-left min-w-15px">Phone</th>
                                                        
                                                        
                                                        <th class="text-center min-w-10px">Status</th>
                                                        <th class="text-center min-w-10px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(@$items->count() > 0): ?>
                                                        <?php $__currentLoopData = @$items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <?php echo e($items->pages->start + $index + 1); ?>

                                                                </td>
                                                                <td class="text-center"><?php echo Helper::getImage($item->image); ?></td>
                                                                <td class="text-left"><?php echo e(@$item->firstname); ?>

                                                                    <?php echo e(@$item->lastname); ?>

                                                                </td>
                                                                <td class="text-left">
                                                                    <?php if($item->customer): ?>
                                                                        <?php echo e($item->customer->firstname); ?>

                                                                        <?php echo e($item->customer->lastname); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td class="text-left"><?php echo e(@$item->email); ?></td>
                                                                <td class="text-left"><?php echo e(@$item->phone); ?></td>
                                                                
                                                                
                                                                <td class="text-center"><?php echo Helper::new_status($item->isActive); ?></td>
                                                                <td class="text-center">
                                                                    
                                                                    <a
                                                                        href="<?php echo e(url("$segment/$folder/edit/$item->id")); ?>"><i
                                                                            class="fa fa-edit fa-2x"
                                                                            style="margin-right:5px;"></i></a>
                                                                    <a href="javascript:void(0);"
                                                                        onclick="deleteItem(<?php echo e($item->id); ?>)"><i
                                                                            class="fa fa-trash fa-2x"
                                                                            style="margin-right:5px;"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="7" class="text-center">- No items -</td>
                                                        </tr>
                                                    <?php endif; ?>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="table-footer mt-2">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style=" ">

                                                    </p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <?php echo $items->appends(request()->all())->links('back-end.layout.pagination'); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Content container-->
                </div>

            </div>
            <!--end::Content wrapper-->

            <!--begin::Footer-->
            <div id="kt_app_footer" class="app-footer">
                <?php echo $__env->make("$prefix.layout.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!--End::Footer-->
        </div>
        <!--End::Main-->
    </div>
    </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>

    <!--begin::Javascript-->
    <?php echo $__env->make("$prefix.layout.script", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        var fullUrl = window.location.origin + window.location.pathname;

        function listOrderChange(id) {
            var sort = $('#sort_' + id).val();
            $.ajax({
                type: 'POST',
                url: fullUrl + "<?php echo e('/changeSort'); ?>",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    id: id,
                    sort: sort
                },
                dataType: 'json',
                success: function(data) {
                    location.reload();
                }
            });
        }

        function deleteItem(ids) {
            const id = [ids];
            if (id.length > 0) {
                destroy(id)
            }
        }

        function destroy(id) {
            Swal.fire({
                title: "Delete",
                text: "Do you want to delete your item ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(fullUrl + '/destroy/' + id)
                        .then(response => response.json())
                        .then(data => location.reload())
                        .catch(error => {
                            Swal.showValidationMessage(`Request failed: ${error}`)
                        })
                }
            });
        }
    </script>
    <!--end::Javascript-->


</body>
<!--end::Body-->

</html>
<?php /**PATH C:\laragon\www\gfm\resources\views/back-end/pages/setting/cleaner/index.blade.php ENDPATH**/ ?>