<?php
return [

    'table' => [
        'sl'                => 'SL',
        'name'              => 'Name',
        'code'              => 'Code',
        'image'             => 'Image',
        'category'          => 'Category',
        'email'             => 'Email',
        'slug'              => 'Slug',
        'title'             => 'Title',
        'symbol'            => 'Symbol',
        'action'            => 'Action',
        'mobile'            => 'Mobile',
        'role'              => 'Role',
        'roles'             => 'Roles',
        'status'            => 'Status',
        'edit'              => 'Edit',
        'delete'            => 'Delete',
        'created_at'        => 'Created On',
        'created_by'        => 'Created By',
        'keyword'           => 'Keyword',
        'date'              => 'Publish Date',
        'image_count'       => 'No of Photos',
        'expiration_date'   => 'Expiration Date',
        'phone'             => 'Phone No',
        'catalog_name'      => 'Catalog Name',
        'catalog_count'     => 'No of Catalogs',
        'phone_status'      => 'Phone Status',
        'enabled'           => 'Enable',
        'disabled'          => 'Disable',
    ],

    'form'  => [
            'id'                => 'ID',
            'nid'               => 'NID',
            'officer_id'        => 'Officer ID',
            'confirm-password'  => 'Confirm Password',
            'image'             => 'Image',
            'code'              => 'Code',
            'title'             => 'Title',
            'category'          => 'Category',
            'tag'               => 'Tag',
            'description'       => 'Description',
            'upload_image'      => 'Upload Image',
            'change_image'      => 'Change Image',
            'upload_video'      => 'Upload Video',
            'name'              => 'Name',
            'email'             => 'Email',
            'symbol'            => 'Symbol',
            'robotTxt'          => 'Robots.txt Content',
            'phone'             => 'Phone',
            'slug'              => 'Slug',
            'password'          => 'Password',
            'mobile'            => 'Mobile',
            'division'          => 'Division',
            'district'          => 'District',
            'address'           => 'Address',
            'password-confirm'  => 'Confirm Password',
            'role'              => 'Role',
            'status'            => 'Status',
            'role-current'      => 'Current Role',
            'add-button'        => 'Create',
            'save-button'       => 'Save',
            'edit-button'       => 'Edit',
            'update-button'     => 'Update',
            'delete-button'     => 'Delete',
            'user-since'        => 'User Since',
            'last-update'       => 'Last Update',
            'action'            => 'Action',
            'edit'              => 'Edit',
            'delete'            => 'Delete',
            'delete-message'    => 'Are you sure?',
            'show-button'       => 'Show',

            'facebook'          => 'Facebook',
            'twitter'           => 'Twitter',
            'instagram'         => 'Instagram',
            'linkedin'          => 'Linkedin',
            'github'            => 'Github',
           
            'website_title'         => 'Website Title',
            'website_logo_dark'     => 'Website Logo Dark',
            'website_logo_light'    => 'Website Logo Light',
            'website_logo_small'    => 'Website Logo Small',
            'website_favicon'       => 'Website Favicon',
            'meta_title'            => 'Meta Title',
            'meta_description'      => 'Meta Description',
            'meta_keywords'         => 'Meta Keywords',
            'no_of_rows'            => 'Number of Rows',
            'no_of_columns'         => 'Number of Columns',
            'keyword'               => 'Keyword',
            'date'                  => 'Date',
            'no_of_similar_showcase'=> 'No of Similar Showcases',


            'validation'    => [
                'password' => [
                    'required'  => 'The password field is required!',
                    'same'      => 'The password and confirm-password must match.',
                    'min'       => 'Password length must be greater than 5.',
                ],
                'name' => [
                    'required'  => 'The name field is required!',
                    'unique'    => 'Name already exists!',
                ],
                'nid' => [
                    'required'  => 'The NID field is required!',
                    'unique'    => 'NID already exists!',
                ],
                'code' => [
                    'required'  => 'The code field is required!',
                    'unique'    => 'Code already exists!',
                ],
                'slug' => [
                    'required'  => 'The slug field is required!',
                    'unique'    => 'Slug already exists!',
                ],
                'symbol' => [
                    'required'  => 'The symbol field is required!',
                    'unique'    => 'Symbol already exists!',
                ],
                'meta_title' => [
                    'required'  => 'The meta title field is required!',
                ],
                'description' => [
                    'required'  => 'The description field is required!',
                ],
                'meta_description' => [
                    'required'  => 'The meta description field is required!',
                ],
                'meta_keywords' => [
                    'required'  => 'The meta keywords field is required!',
                ],
                'category' => [
                    'required'  => 'The category field is required!',
                ],
                'status' => [
                    'required'  => 'The status field is required!',
                ],
                'permission' => [
                    'required'  => 'The permission field is required!',
                ],
                'email' => [
                    'required'  => 'The email field is required!',
                    'email'     => 'Please your email format!',
                    'unique'    => 'Email already exists!',
                ],
                'roles' => [
                    'required'  => 'The roles field is required!',
                ],
                'mobile' => [
                    'required'  => 'The mobile field is required!',
                ],
                'district' => [
                    'required'  => 'The district field is required!',
                ],
                'sub_district' => [
                    'required'  => 'The sub_district field is required!',
                ],
                'address' => [
                    'required'  => 'The address field is required!',
                ],
                'image' => [
                    'required'  => 'The image field is required!',
                    'image'     => 'The uploaded file must be an image!',
                    'mimes'     => 'Only jpeg,png,jpg formats are supported!',
                    'max'       => 'File size must not be more than 10M!',
                ],
                'keyword' => [
                    'required'  => 'The keyword field is required!',
                ],
                'date' => [
                    'required'  => 'The date field is required!',
                ],
                // catalog
                'catalog' => [
                    'required'  => 'The catalog field is required!',
                    'unique'    => 'This catalog name is already exist',
                ],
                'phone' => [
                    'required'  => 'The phone field is required.'
                ],
                'phone' => [
                    'required'  => 'The phone field is required.',
                    'max' => 'The phone number should not exceed 20 characters.'
                ],
            ],
        ],
];