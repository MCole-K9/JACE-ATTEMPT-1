export type User = {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
    role_id: number;
    created_at: Date;
    updated_at: Date;
    org_rep ?: {
        org_role_id: number;
        organization_id: number;
    }
}

export type OrgRep = {
    id: number;
    user_id: number;
    org_role_id: number;
    organization_id: number;
    created_at: Date;
    updated_at: Date;
    user?: User;
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
    organization?: Organization;
}

export type CustomRequest = {
    type: "Member Removal" | "Role Change",
    info: string,
    status: "Pending" | "Approved" | "Denied",
    user_id: number
}

export type pageRange = {
    start: number;
    end: number;
}

export type UserActivityLog = {
    id: number;
    name: string;
    description: string;
    subject: number;
    causer: number;
    timestamp: string;

}

// absolutely too lazy rn to write the full definition, just putting it here for now

export type InfractionLog = {
    id: number;
}