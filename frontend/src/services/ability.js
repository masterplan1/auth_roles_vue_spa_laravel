// import { Ability } from "@casl/ability";
// let ability = new Ability();
// export default ability;

// import { defineAbility } from '@casl/ability';

// export default defineAbility((can, cannot) => {
//   can('read', 'Post');
//   cannot('delete', 'Post', { published: true });
// });

import { Ability } from '@casl/ability';

const roles = JSON.parse(sessionStorage.getItem('ROLES') || '[]')
export default new Ability([
  ...roles
  // {
  //   action: 'read',
  //   subject: 'Post'
  // },
  // {
  //   inverted: true,
  //   action: 'delete',
  //   subject: 'Post',
  //   conditions: { published: true }
  // }
])

