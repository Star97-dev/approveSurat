
                 
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h2 mb-4 text-gray-800">My Profile</h1>
                    <div class="card mb-3" style="max-width: 500px;">
                    <div class="row g-0">
                        <div class="col-md">
                        <div class="card-body">
                            <h5 class="card-title"> <?=isset($user['name']) ? $user['name'] : ''?> </h5>
                            <p class="card-text"><?=isset($user['email']) ? $user['email'] : ''?>
                            <br><?=isset($user['phone']) ? $user['phone'] : ''?>
                        </p>
                            <p class="card-text"><small class="text-muted">Member since : <?=isset($user['date_created']) ? $user['date_created'] : ''?></small></p>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         