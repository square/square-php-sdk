
# Update Job Request

Represents an [UpdateJob](../../doc/apis/team.md#update-job) request.

## Structure

`UpdateJobRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `job` | [`Job`](../../doc/models/job.md) | Required | Represents a job that can be assigned to [team members](../../doc/models/team-member.md). This object defines the<br>job's title and tip eligibility. Compensation is defined in a [job assignment](../../doc/models/job-assignment.md)<br>in a team member's wage setting. | getJob(): Job | setJob(Job job): void |

## Example (as JSON)

```json
{
  "job": {
    "is_tip_eligible": true,
    "title": "Cashier 1",
    "id": "id6",
    "created_at": "created_at4",
    "updated_at": "updated_at8"
  }
}
```

