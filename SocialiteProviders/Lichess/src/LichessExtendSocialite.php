<?php

namespace SocialiteProviders\Lichess;

use SocialiteProviders\Manager\SocialiteWasCalled;

class LichessExtendSocialite
{
    /**
     * Execute the provider.
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('lichess', __NAMESPACE__.'\Provider');
    }
}
