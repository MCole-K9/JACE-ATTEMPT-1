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
    street_address: string;
    city: string;
    state: string;
    zip: string;
    country: string | undefined; // little lie rn
    code: string;
    description: string | undefined;
    phone: string;
    email: string;
    website: string;
    logo: string | undefined;
    created_at: Date;
    updated_at: Date;
}
