import {defineStore} from "pinia";

import type {User} from "../Lib/types";
import { OrgRoles, Roles } from "../Lib/const";
import { router } from "@inertiajs/vue3";

let user: User | null = null;

export const userStore = defineStore("user", {
    state: () => ({
        user: user,
        profileChanged: false,
    }),
    getters: {
        getFullName(): string {
            return this.user?.first_name + " " + this.user?.last_name;
        },
        getAvatarUrl(): string {
            return this.user?.avatar_url as string;
        },
        getTempAvatarUrl(): string | undefined {
            return this.user?.temp_avatar_url;
        },
        isAdmin(): boolean {
            return this.user?.role_id === Roles.Admin;
        },
        isCandidate(): boolean {
            return this.user?.role_id === Roles.Candidate;
        },
        isOrgRep(): boolean {
            return this.user?.role_id === Roles.OrganizationRep;
        },
        isOrgAdmin(): boolean {
            return this.user?.org_rep?.org_role_id === OrgRoles.Admin;
        },
        isRecruiter(): boolean {
            return this.user?.org_rep?.org_role_id === OrgRoles.Recruiter;
        },
    },
    actions: {
        setUser(user: User | null, org_rep: any = null) {
            this.user = user;
            //need to rethink this whole thing
            if(org_rep) {
                this.user.org_rep = org_rep;
            }



        },
        setAvatarUrl(url: string) {
            this.user!.avatar_url = url;
        },
        logOut() {
            //might move
            router.get("/logout");
        }
    }
});
