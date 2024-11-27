<fieldset>
  <legend>Informacion general de nuestra propiedad</legend>

  <label for="titulo">Titulo:</label>
  <input type="text" id="titulo" name="propiedad[titulo]" placeholder="titulo propiedad" value="<?php echo s($propiedad->titulo); ?>">


  <label for="precio">Precio:</label>
  <input type="number" name="propiedad[precio]" id="precio" placeholder="precio propiedad" value="<?php echo s($propiedad->precio); ?>">

  <label for="imagen">Imagen:</label>
  <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]"> <!-- de esta manera creo un arreglo con la llave de propiedad -->

  <?php if ($propiedad->imagen) { ?>
    <img src="/bienesraices/imagenes/<?php echo $propiedad->imagen ?>" alt="" class="imagen-small">
  <?php } ?>
  <label for="descripcion">Descripcion:</label>
  <textarea name="propiedad[descripcion]" id="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
  <legend>Informacion de la propiedad</legend>

  <label for="habitaciones">Habitacion:</label>
  <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Numero de habitaciones" value="<?php echo s($propiedad->habitaciones); ?>" min="1" max="9">

  <label for="wc">Baños:</label>
  <input type="number" id="wc" name="propiedad[wc]" placeholder="Numero baños" value="<?php echo s($propiedad->wc); ?>" min="1" max="9">

  <label for="estacionamiento">Estacionamiento:</label>
  <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Estacionamientos" value="<?php echo s($propiedad->estacionamiento); ?>" min="1" max="9">
</fieldset>

<fieldset>
  <legend>Vendedores</legend>
  <label for="vendedor"> Vendedor </label>
  <select name="propiedad[vendedores_id]" id="vendedor">
    <option selected value="">-- seleccione --</option>
    <?php foreach ($vendedores as $vendedor): ?>
      <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?> 
      value="<?php echo s($vendedor->id) ?>"> <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?> </option>
    <?php endforeach; ?>
  </select>
</fieldset>