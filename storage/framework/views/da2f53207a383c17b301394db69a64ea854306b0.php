<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .tableClass{
              align: center;
              margin-top: 50px;
            }
            .showData{
              align: center;
              font-weight: bold;
              color: red;
              margin-top: 20px;
            }

            table {
                  border-collapse: collapse;
              }

              table, td {
                  border: 1px solid black;
                  font-weight: bold;
              }
               th {
                  border: 1px solid black;
                  font-weight: bold;
                  color: red;
              }
        </style>
    </head>
    <body>

        <div>

            <div class="content">
              <div class= 'showData'><a href="view/data">View Saved Data List</a></div>

              <div class="tableClass">
                <table style="width:100%">
                    <tr>
                      <th>Course Id</th>
                      <th>Course Name</th>
                      <th>Course Type</th>
                      <th>Action</th>
                    </tr>
                     <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php echo e(Form::open(array('url' => 'save/data'))); ?>

                    <tr>
                      <td><input type="hidden" name="id" value="<?php echo $res['id']; ?>"> <?php echo $res['id']; ?></td>
                      <td><input type="hidden" name="name" value="<?php echo $res['name']; ?>"> <?php echo $res['name']; ?></td>
                      <td><input type="hidden" name="type" value="<?php echo $res['courseType']; ?>"> <?php echo $res['courseType']; ?></td>
                      <td><input type="submit" id ="sub<?php echo $res['id']; ?>" class="btn btn-success btn-md" value="Save"></td>
                    </tr>
                    <?php echo e(Form::close()); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
              </div>
              <?php if(\Session::has('success')): ?>
                  <div class="alert alert-success">
                      <ul>
                          <li><?php echo \Session::get('success'); ?></li>
                      </ul>
                  </div>
              <?php endif; ?>
            </div>
        </div>

    </body>
</html>
