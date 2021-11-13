<?php if(!empty($producers)):?>
  <div style="margin: 30px 0px;">
    <div class="menu-trai">
      <ul style="padding: 20px 0px 10px 0px" class="">
        <?php foreach ($producers as $producer): ?>
          <label class="producers"> <?php echo $producer['name']; ?>
            <input type="checkbox" value="<?php echo $producer['id']; ?>" class="common_selector brand" name="producer[]">
            <span class="w3docs"></span>
          </label>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?php endif; ?>