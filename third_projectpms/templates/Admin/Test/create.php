<?php

echo $this->Form->create(null);
echo $this->Form->control('name');
echo $this->Form->control('email');
echo $this->Form->button('Submit');
echo $this->Form->end();
?>