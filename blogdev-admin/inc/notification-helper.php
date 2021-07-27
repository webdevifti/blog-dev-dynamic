<?php

if(isset($result['success'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
        <?php echo $result['success']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php
}else if(isset($result['error'])){ ?>
    <h6 class="card p-2 alert-error-msg">
            <?php echo $result['error']; ?>
            <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }

if(isset($_SESSION['PUBLISH_POST'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
        <?php echo $_SESSION['PUBLISH_POST']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['PUBLISH_POSTERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
        <?php echo $_SESSION['PUBLISH_POSTERROR']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }
if(isset($_SESSION['PENDING'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
        <?php echo $_SESSION['PENDING']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['PENDINGERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
            <?php echo $_SESSION['PENDINGERROR']; ?>
            <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }
if(isset($_SESSION['DELETE_POST'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
    <?php echo $_SESSION['DELETE_POST']; ?>
    <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['DELETE_POSTERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
        <?php echo $_SESSION['DELETE_POSTERROR']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }
if(isset($_SESSION['UPDATE_POST'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
      <?php echo $_SESSION['UPDATE_POST']; ?>
      <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['UPERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
          <?php echo $_SESSION['UPERROR']; ?>
          <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php }

if(isset($_SESSION['EXIST_CAT'])){ ?>
    <h6 class="card p-2 alert-error-msg">
          <?php echo $_SESSION['EXIST_CAT']; ?>
          <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
}

if(isset($_SESSION['ADD_CAT'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
        <?php echo $_SESSION['ADD_CAT']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['CATERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
            <?php echo $_SESSION['CATERROR']; ?>
            <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }

if(isset($_SESSION['DELETE_CAT'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
        <?php echo $_SESSION['DELETE_CAT']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['DELETE_CATERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
            <?php echo $_SESSION['DELETE_CATERROR']; ?>
            <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }

if(isset($_SESSION['CATDEACTIVE'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
        <?php echo $_SESSION['CATDEACTIVE']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['CATDEACTIVEERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
            <?php echo $_SESSION['CATDEACTIVEERROR']; ?>
            <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }
if(isset($_SESSION['CATACTIVE'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
        <?php echo $_SESSION['CATACTIVE']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['CATACTIVEERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
            <?php echo $_SESSION['CATACTIVEERROR']; ?>
            <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }
if(isset($_SESSION['UPDATE_CATE'])){ ?>
    <h6 class="card p-2 alert-succes-msg">
        <?php echo $_SESSION['UPDATE_CATE']; ?>
        <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
    <?php
    }else if(isset($_SESSION['UPCATERROR'])){ ?>
    <h6 class="card p-2 alert-error-msg">
            <?php echo $_SESSION['UPCATERROR']; ?>
            <a href="javascript:void(0)" class="alert-close">&times;</a>
    </h6>
<?php }




unset($_SESSION['DELETE_POST']);
unset($_SESSION['PENDING']);
unset($_SESSION['ERROR']);
unset($_SESSION['PUBLISH_POST']);
unset($_SESSION['UPDATE_POST']);
unset($_SESSION['EXIST_CAT']);
unset($_SESSION['ADD_CAT']);
unset($_SESSION['CATERROR']);
unset($_SESSION['DELETE_POSTERROR']);
unset($_SESSION['UPERROR']);
unset($_SESSION['PENDINGERROR']);
unset($_SESSION['PUBLISH_POSTERROR']);
unset($_SESSION['DELETE_CAT']);
unset($_SESSION['DELETE_CATERROR']);
unset($_SESSION['CATDEACTIVE']);
unset($_SESSION['CATDEACTIVEERROR']);
unset($_SESSION['CATACTIVE']);
unset($_SESSION['CATACTIVEERROR']);
unset($_SESSION['UPDATE_CATE']);
unset($_SESSION['UPCATERROR']);