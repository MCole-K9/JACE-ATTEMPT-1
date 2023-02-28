import {defineStore} from "pinia";

import type {User} from "../Lib/types";
import { OrgRoles, Roles } from "../Lib/const";
import { router } from "@inertiajs/vue3";

let user: User | null = null;

export const userStore = defineStore("user", {
    state: () => ({
        user: user,
    }),
    getters: {
        getFullName(): string {
            return this.user?.first_name + " " + this.user?.last_name;
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
        setUser(user: User | null) {
            this.user = user;
        },
        logOut() {
            //might move
            router.get("/logout");
        }
    }
});
