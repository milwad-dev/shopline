<?php

namespace Modules\Share\Traits;

use Illuminate\Http\RedirectResponse;
use Modules\Share\Services\ShareService;

trait SuccessToastMessageWithRedirectTrait
{
    /**
     * Show success message with redirect;.
     *
     * @param string $title
     * @param array  $params
     *
     * @return RedirectResponse
     */
    private function successMessageWithRedirect(string $title, array $params = [])
    {
        ShareService::successToast($title);

        if (!$this->redirectRoute) {
            return redirect()->back();
        }

        return to_route($this->redirectRoute, $params);
    }
}
