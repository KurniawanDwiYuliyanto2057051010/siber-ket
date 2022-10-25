<?php echo view('templates/h'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Membership Siber-ket</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Mohon Input Data Dengan Benar!</h3>
            </div>
            <!-- /.card-header -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Created_At</th>
                  <th scope="col">Updated_At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $no = 1;

                foreach ($member as $mbr) :
                  $dataNik = $mbr['nik']
                ?>

                  <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $mbr['nik'] ?></td>
                    <td><?= $mbr['namaLengkap'] ?></td>
                    <td><?= $mbr['created_at'] ?></td>
                    <td><?= $mbr['updated_at'] ?></td>
                    <td>
                      <div class="d-flex">
                        <a class="btn btn-warning mr-3" href="/edit/<?= $mbr['nik'] ?>">Edit</a>
                        <form action="/delete/<?= $mbr['nik'] ?>" method="post">
                          <input name="_method" value="DELETE" type="hidden">
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>

                <?php

                  $no++;
                endforeach

                ?>

              </tbody>
            </table>

            <!-- /.card-body -->
          </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li><?= $pager->Links() ?></li>
            </ul>
          </nav>
          <!-- /.card -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php echo view('templates/f'); ?>