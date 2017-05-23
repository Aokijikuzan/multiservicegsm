<?php

namespace MultiServiceGsm\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MultiServiceGsmUserBundle extends Bundle
{
	public function getParent()
  {
    return 'FOSUserBundle';
  }

}
