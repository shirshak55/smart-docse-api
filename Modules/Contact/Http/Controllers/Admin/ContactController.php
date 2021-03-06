<?php

namespace Modules\Contact\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Contact\Models\Contact\Contact;
use Modules\Core\Http\Controllers\Admin\AdminController;
use Modules\Core\Utils\RequestSearchQuery;

class ContactController extends AdminController
{
    public function search(Request $request)
    {
        $requestSearchQuery = new RequestSearchQuery($request, Contact::query(), [
            'sender_name',
            'email',
            'subject',
            'content',
        ]);

        if ($request->get('exportData')) {
            return $requestSearchQuery->export([
                'sender_name',
                'email',
                'subject',
                'content',
                'created_at',
                'updated_at',
            ],
                [
                    'Sender Name',
                    'Email',
                    'Subject',
                    'Content',
                    'Created At',
                    'Updated At',
                ],
                'contact');
        }

        return $requestSearchQuery->result();
    }

    public function show(Contact $contact)
    {
        return $contact;
    }
}
