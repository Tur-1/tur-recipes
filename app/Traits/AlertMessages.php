<?php

namespace App\Traits;


trait AlertMessages
{

    public function showTostSuccessMessage($message)
    {
        $this->dispatchBrowserEvent('show-alert-message', ['message' => $message, 'background' => "bg-primary"]);
    }

    public function showTostErrorMessage($message)
    {
        $this->dispatchBrowserEvent('show-alert-message', ['message' => $message, 'background' => "bg-danger"]);
    }
    public function RedirectWithSuccessMsg($RouteName, $message)
    {
        return redirect()->route($RouteName)->with('message', $message);
    }
    public function RedirectToUrlWithSuccessMsg($url, $message)
    {
        return redirect()->to($url)->with(['message' => $message, 'background' => "bg-primary"]);
    }
    public function RedirectBackWithErrorMsg($message)
    {
        return redirect()->back()->with(['message' => $message, 'background' => "bg-danger"]);
    }
    public function RedirectBackWithSuccessMsg($message)
    {
        return redirect()->back()->with(['message' => $message, 'background' => "bg-primary"]);
    }
}