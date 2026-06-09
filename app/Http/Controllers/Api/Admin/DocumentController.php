<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Document;

class DocumentController extends BaseCrudController
{
    protected string $model = Document::class;
}
