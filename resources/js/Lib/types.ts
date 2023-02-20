export type User = {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
    role_id: number;
}


export type Organization = {
    id: number;
    name: string;
    address: string;
    code: string;
    description: string;
    // phone: string; need to add these to the migration
    // email: string;
    // website: string;
    // logo: string;
    created_at: Date;
    updated_at: Date;
}
