export type User = {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
    role_id: number;
    org_rep ?: {
        org_role_id: number;
        organization_id: number;
    }
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

export type Job = {
    id: number;
    title: string;
    description: string;
    location: string;
    salary: number;
    requirements: string;
    type: string;
    is_visible: boolean;
    open_date: Date;
    close_date: Date;
    org_rep_id: number;
    organization_id: number;
    created_at: Date;
    updated_at: Date;
}
