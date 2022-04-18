<?php

namespace App\Traits;


trait AlertMessages
{

    public function showTostSuccessMessage($message)
    {
        $this->dispatchBrowserEvent('showMessage', ['message' => $message, 'background' => "bg-alert-success"]);
    }

    public function showTostErrorMessage($message)
    {
        $this->dispatchBrowserEvent('showMessage', ['message' => $message, 'background' => "bg-alert-error"]);
    }
    public function RedirectWithSuccessMsg($RouteName, $message)
    {
        return redirect()->route($RouteName)->with('message', $message);
    }
    public function RedirectToUrlWithSuccessMsg($url, $message)
    {
        return redirect()->to($url)->with(['message' => $message, 'background' => "bg-alert-success"]);
    }
    public function RedirectBackWithErrorMsg($message)
    {
        return redirect()->back()->with(['message' => $message, 'background' => "bg-alert-error"]);
    }
    public function RedirectBackWithSuccessMsg($message)
    {
        return redirect()->back()->with(['message' => $message, 'background' => "bg-alert-success"]);
    }
}