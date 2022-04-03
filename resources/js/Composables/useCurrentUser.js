import { Inertia } from "@inertiajs/inertia";
import User from "../Models/User";

export function useCurrentUser() {
  return new User(Inertia.page.props.auth.user);
}
