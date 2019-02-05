<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
  <link rel="shortcut icon" href="<?= base_url('recursos/img/favicon.png') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('recursos/css/administrador.css') ?>">
  <link rel="stylesheet" href="<?= base_url('recursos/confirm/css/jquery-confirm.css') ?>">
  <link href="https://file.myfontastic.com/BMtuhhr2srGn63QckjacDV/icons.css" rel="stylesheet">
</head>
<body>
  <div class="logo">
    <img src="<?= base_url('recursos/img/logo.jpg') ?>">
  </div>
  <header class="headerAdmin">
    <nav>
      <ul class="left">
        <li><a href="<?= base_url('administrador/proyectos') ?>">Proyectos</a></li>
        <li><a href="<?= base_url('administrador/caracteristicas') ?>">Caracteristicas</a></li>
        <li><a href="<?= base_url('administrador/terminados') ?>">Proyectos Terminados</a></li>
      </ul>

      <ul class="right">
        <li><a href="<?= base_url('administrador/admin') ?>">Administrador</a></li>
        <li><a href="<?= base_url('login/logout') ?>">Cerrar Sesion</a></li>
      </ul>
    </nav>
  </header>
  <div class="container">
    <div style='height:20px;'></div>
    <div class="grupo">
      <div class="caja-60">
        <form id="formEdificio">
          <div class="grupo">
            <div class="caja-40">
              <input type="hidden" name="proyecto" value="<?= $this->uri->segment(3) ?>">
              <input type="text" name="nombre" class="Canvas-input nombre" placeholder="Nombre de Edificio">
            </div>
          </div>
          <div class="grupo">
            <div class="caja-60">
              <input type="text" name="coordenadas" id="poligono" class="Canvas-input" placeholder="Coordenadas de Mapeo">
            </div>
            <div class="caja-40">
              <button type="button" class="Canvas-boton limpiar"><i class="icon-clean"></i>  Limpiar</button>
              <button type="submit" class="Canvas-boton agregar"><i class="icon-add"></i> Agregar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="caja-40" id="imagen-distribucion">
          <table border="1">
            <thead>
              <tr>
                <th>Edificio</th>
                <th>Coordenadas</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="reg-edificios">
              <?php foreach ($edificios as $e): ?>
              <tr id="fil-<?= $e->edi_id ?>">
                <td><?= $e->edi_nombre ?></td>
                <td><?= $e->edi_coordenadas ?></td>
                <td><button class="Canvas-boton dibujar" data-coordenadas="<?= $e->edi_coordenadas ?>"><i class="icon-dibujar"></i> Dibujar</button></td>
                <td><button class="Canvas-boton eliminar" data-id="<?= $e->edi_id ?>"><i class="icon-delete"></i> Eliminar</button></td>
                <td><a class="Canvas-boton dpto"><i class="icon-dpto"></i> Dptos</a></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
  <script src="<?= base_url('recursos/js/jquery-1.10.2.js') ?>"></script>
  <script src="<?= base_url('recursos/confirm/js/jquery-confirm.js') ?>"></script>
  <script src="<?= base_url('recursos/js/jquery.validate.js') ?>"></script>
  <script src="<?= base_url('recursos/canvas-area-draw/jquery.canvasAreaDraw.min.js') ?>"></script>
  <script src="<?= base_url('recursos/canvas-area-draw/mapeo.js') ?>"></script>
  <script>
    $(function(){
      $('#poligono').canvasAreaDraw({
        imageUrl: "<?= base_url('assets/uploads/proyectos/distribucion/3a17f-plano-general-real.jpg') ?>"
      });
    });
  </script>
</body>
</html>
