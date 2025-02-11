<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MemberIdentityTypeComponent extends Component
{
    public function __construct(
        public string $name,
        public string $value,
        public string $id,
        public string $isRequired,
        public string $placeHolder,
        public string $maxLength,
        public string $class,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.member-identity-type-component');
    }
}
