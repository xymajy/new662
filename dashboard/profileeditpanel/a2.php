<!DOCTYPE html>
<html lang="en">
<?php echo "haha" ; ?>

<div style="width:120px; height:120px; border-radius:50%; overflow:hidden;">
<img src="<?php echo $icon; ?>" onload='if (this.width>140 || this.height>226) if (this.width/this.height>140/226) this.width=140; else this.height=226;' alt = "<?php echo htmlout($id)."'s icon"; ?>"  />
</div>
</html>