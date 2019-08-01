<?php require_once 'includes/cabecera.php'; ?>


<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link dropdown-item" data-toggle="collapse" data-target="#profes"> Profesores </a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-item" data-toggle="collapse" data-target="#mat"> Materias </a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-item" data-toggle="collapse" data-target="#adm"> Coordinadores / Adm </a>
            </li>
        </ul>
    </div>
    
        <div class="card-body collapse" id="profes">
            <h3> Profesores </h3>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Numero de Control</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $profes = Pendientes_Profes($bd);
                    if (!empty($profes)):
                        while ($prof = mysqli_fetch_assoc($profes)):
                ?>
                  <tr>
                    <td> <?= $prof['nombre'] ?> </td>
                    <td> <?= $prof['apellido'] ?> </td>
                    <td> <?= $prof['ncontrol'] ?> </td>
                    <td> <?= $prof['correo'] ?> </td>
                    <td> <a class="btn btn-success btn-sm" href="php/accion_pend.php?pa=<?= $prof['id'] ?>"> Aceptar </a> || <a class="btn btn-danger btn-sm" href="php/accion_pend.php?pn=<?= $prof['id'] ?>"> Eliminar </a> </td>
                  </tr>
                <?php
                        endwhile;
                    endif;
                ?>
                </tbody>
              </table>
        </div>

        <div class="card-body collapse" id="adm">
            <h3> Coordinadores </h3>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Numero de Control</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $adms = Pendientes_Adm($bd);
                    if (!empty($adms)):
                        while ($adm = mysqli_fetch_assoc($adms)):
                ?>
                  <tr>
                    <td> <?= $adm['nombre'] ?> </td>
                    <td> <?= $adm['apellido'] ?> </td>
                    <td> <?= $adm['ncontrol'] ?> </td>
                    <td> <?= $adm['correo'] ?> </td>
                    <td> <a class="btn btn-success btn-sm" href="php/accion_pend.php?aa=<?=$adm['id']?>" > Aceptar </a> || <a class="btn btn-danger btn-sm" href="php/accion_pend.php?an=<?=$adm['id']?>"> Eliminar </a> </td>
                  </tr>
                <?php
                        endwhile;
                    endif;
                ?>
                </tbody>
              </table>
        </div>

        <div class="card-body collapse" id="mat">
            <h3> Materias </h3>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Profe Solicitador</th>
                    <th scope="col">Modulo</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $mat = Pendientes_Mat($bd);
                    /*var_dump($mat);
                    var_dump($mat['field_count']);*/
                    if (!empty($mat)):
                        while ($materia = mysqli_fetch_row($mat)):?>
                     
                    <tr>
                        <td> <?= $materia[1] ?> </td>
                        <td> <?= $materia[2].' '.$materia[3] ?> </td>
                        <td> <?= $materia[0] ?> </td>
                        <td> <a class="btn btn-success btn-sm" href="php/accion_pend.php?ma=<?=$materia[0]?>" > Aceptar </a> || <a class="btn btn-danger btn-sm" href="php/accion_pend.php?mn=<?=$adm['id']?>"> Eliminar </a> </td>
                    </tr>
                
                <?php
                        endwhile;
                    endif;
                ?>
                </tbody>
            </table>
        </div>
    
</div>